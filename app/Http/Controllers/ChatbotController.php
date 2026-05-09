<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    /**
     * Memulai sesi chat baru atau melanjutkan sesi yang ada.
     * Guest user diidentifikasi via session_token.
     */
    public function startSession(Request $request)
    {
        $sessionToken = $request->session_token;

        if ($sessionToken) {
            $chatSession = ChatSession::where('session_token', $sessionToken)->first();
        }

        if (!isset($chatSession) || !$chatSession) {
            $chatSession = ChatSession::create([
                'session_token' => Str::uuid()->toString(),
                'user_id' => $request->user()?->id,
                'ip_address' => $request->ip(),
            ]);
        }

        $messages = $chatSession->messages()->orderBy('created_at')->get();

        return response()->json([
            'session_token' => $chatSession->session_token,
            'messages' => $messages,
        ]);
    }

    /**
     * Menerima pesan user dan mengembalikan respons dari AI Chatbot.
     * Chatbot menggunakan knowledge base dari database produk.
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'session_token' => 'required|string',
            'message' => 'required|string|max:1000',
        ]);

        $chatSession = ChatSession::where('session_token', $validated['session_token'])->firstOrFail();

        // Simpan pesan user
        $chatSession->messages()->create([
            'role' => 'user',
            'message' => $validated['message'],
        ]);

        // Generate respons AI
        // TODO: Integrasikan dengan OpenAI API atau layanan AI lainnya
        // Untuk saat ini, gunakan respons placeholder berbasis keyword
        $response = $this->generateResponse($validated['message']);

        // Simpan respons assistant
        $chatSession->messages()->create([
            'role' => 'assistant',
            'message' => $response,
        ]);

        return response()->json([
            'response' => $response,
        ]);
    }

    /**
     * Respons placeholder berbasis keyword matching.
     * Akan diganti dengan integrasi AI yang sesungguhnya.
     */
    private function generateResponse(string $message): string
    {
        $message = strtolower($message);

        if (str_contains($message, 'harga') || str_contains($message, 'price')) {
            return 'Untuk informasi harga terbaru, silakan hubungi tim kami melalui WhatsApp. Harga dapat bervariasi berdasarkan jumlah pesanan dan jenis kain yang Anda pilih.';
        }

        if (str_contains($message, 'stok') || str_contains($message, 'tersedia')) {
            return 'Ketersediaan stok dapat Anda lihat langsung di halaman katalog kami. Untuk informasi stok real-time, silakan hubungi admin kami via WhatsApp.';
        }

        if (str_contains($message, 'katun') || str_contains($message, 'cotton')) {
            return 'Kami menyediakan berbagai jenis kain katun berkualitas tinggi, mulai dari Cotton Combed 20s hingga 30s dengan beragam warna. Silakan cek katalog kami untuk detail spesifikasi teknis seperti GSM dan lebar kain.';
        }

        if (str_contains($message, 'pesan') || str_contains($message, 'order') || str_contains($message, 'beli')) {
            return 'Untuk melakukan pemesanan, silakan pilih produk yang Anda inginkan di katalog, lalu klik tombol "Pesan via WhatsApp". Tim kami akan memproses pesanan Anda segera.';
        }

        if (str_contains($message, 'kirim') || str_contains($message, 'pengiriman') || str_contains($message, 'ongkir')) {
            return 'Informasi pengiriman dan ongkos kirim akan diinformasikan oleh admin kami saat proses konfirmasi pesanan melalui WhatsApp.';
        }

        return 'Terima kasih atas pertanyaan Anda. Untuk informasi lebih lanjut, silakan jelajahi katalog kain kami atau hubungi tim kami melalui WhatsApp untuk bantuan yang lebih spesifik.';
    }
}
