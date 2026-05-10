<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        if (Auth::user()->role == 'admin') {

            $orders = Order::when($search, function ($query, $search) {

                return $query->where('nama_pelanggan', 'like', "%{$search}%")
                            ->orWhere('no_hp', 'like', "%{$search}%");

            })->get();

        } else {

            $orders = Order::where(
                'user_id',
                Auth::id()
            )
            ->when($search, function ($query, $search) {

                return $query->where('nama_pelanggan', 'like', "%{$search}%")
                            ->orWhere('no_hp', 'like', "%{$search}%");

            })->get();

        }

        return view('orders.index', compact('orders'));
    }


    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'jenis_laundry' => 'required',
            'berat' => 'required|numeric|min:1'
        ]);

        $hargaPerKg = 7000;

        $total = $request->berat * $hargaPerKg;

        Order::create([
            'user_id' => Auth::id(),
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp' => $request->no_hp,
            'jenis_laundry' => $request->jenis_laundry,
            'berat' => $request->berat,
            'total_harga' => $total,
            'status_order' => 'Diproses',
            'payment_status' => 'Belum Lunas',
            'invoice_number' =>'INV-' . time(),
        ]);

        return redirect('/orders');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

   public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status_order' => 'required',
            'payment_status' => 'required'
        ]);

        $order->update([

            'status_order' => $request->status_order,
            'payment_status' => $request->payment_status

        ]);

        // PREMIUM ONLY

        if(Auth::user()->plan == 'premium') {

            $message = "Halo {$order->nama_pelanggan} 👋\n\n";

            $message .= "Status laundry Anda sekarang:\n";

            $message .= "✅ {$order->status_order}\n\n";

            $message .= "Pembayaran: {$order->payment_status}\n\n";

            $message .= "Terima kasih telah menggunakan SmartLaundry 🚀";

            Http::withHeaders([

                'Authorization' => env('FONNTE_TOKEN')

            ])->post('https://api.fonnte.com/send', [

                'target' => $order->no_hp,
                'message' => $message,

            ]);

        }

        return redirect('/orders')
            ->with('success', 'Status berhasil diperbarui');
    }

    public function update(Request $request, Order $order)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }

        $order->update([
            'status_order' => $request->status_order,
            'payment_status' => $request->payment_status
        ]);

        return redirect('/orders');
    }

    public function destroy(Order $order)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);

        }

        $order->delete();

        return redirect('/orders');
    }

    public function invoice(Order $order)
    {
        $pdf = Pdf::loadView(
            'orders.invoice',
            compact('order')
        );

        return $pdf->download(
            'Invoice-'.$order->invoice_number.'.pdf'
        );
    }

    public function trackingForm()
    {
        return view('tracking.index');
    }

    public function trackingResult(Request $request)
    {
        $order = Order::where(
            'no_hp',
            $request->no_hp
        )->latest()->first();

        return view(
            'tracking.result',
            compact('order')
        );
    }

    public function trackingInvoice(string $invoice)
    {
        $order = Order::where('invoice_number', $invoice)->first();

        if (!$order) {
            abort(404, 'Invoice tidak ditemukan');
        }

        return view('tracking.result', compact('order'));

    }
}