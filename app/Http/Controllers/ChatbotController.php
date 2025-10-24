<?php

// app/Http/Controllers/ChatbotController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ChatMessage;

class ChatbotController extends Controller
{
    public function handleChat(Request $request)
    {
        $userMessage = $request->input('message');
        $sessionId = $request->session()->getId();

        // Get last 5 messages for context
        $history = ChatMessage::where('session_id', $sessionId)
            ->latest()
            ->take(5)
            ->get(['user_message', 'bot_response'])
            ->reverse()
            ->values()
            ->map(function ($chat) {
                return [
                    ['role' => 'user', 'content' => $chat->user_message],
                    ['role' => 'assistant', 'content' => $chat->bot_response],
                ];
            })
            ->flatten(1)
            ->toArray();

        // Add current message to conversation
        $messages = array_merge(
            [['role' => 'system', 'content' => 'You are a friendly assistant for Lords of Detailing website. Respond naturally and help users with booking, services, and locations.']],
            $history,
            [['role' => 'user', 'content' => $userMessage]]
        );

        // Call OpenAI API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
            'temperature' => 0.7
        ]);

        $botResponse = trim($response->json('choices.0.message.content') ?? 'Sorry, something went wrong.');

        // Save chat to DB
        ChatMessage::create([
            'session_id' => $sessionId,
            'user_message' => $userMessage,
            'bot_response' => $botResponse
        ]);

        return response()->json(['reply' => $botResponse]);
    }
}

