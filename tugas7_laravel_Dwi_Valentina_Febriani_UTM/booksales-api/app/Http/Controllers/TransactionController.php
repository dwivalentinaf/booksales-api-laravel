<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    // Menampilkan Data

    public function index() {
        $transaction = Transaction::with('user', 'book')->get();

        if ($transaction->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resources",
            "data" => $transaction,

        ], 200);
    }

    // Menambhakan data

    public function store(Request $request)
    {
    
    // 1. validator & cek validator
    $validator = Validator::make($request->all(), [
        'book_id' => 'required|exists:books,id',
        'quantity' => 'required|integer|min:1'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ], 422);
    }

    //2. generate orderNumber
    $uniqueCode = "CRD-" . strtoupper(uniqid());

    // 3. ambil user yang sedang ingin & cek login

    $user = auth('api')->user();

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not authenticated'
        ], 401);
    }

    // mencari data buku dari request 

    $book = Book::find($request->book_id);

    // 5. cek stock buku

    if ($book->stock < $request->quantity) {
        return response()->json([
            'success' => false,
            'message' => 'Stock barang tidak cukup'
        ], 400);
    }

    // 6. hitung total harga = price * quantity

    $totalAmount = $book->price * $request->quantity;

    // 7. kurangi stok buku (updatw)

    $book->stock -= $request->quantity;
    $book->save();

    // 8. simpan data transaksi

    $transactions = Transaction::create([
        'order_number' => $uniqueCode,
        'customer_id' => $user->id,
        'book_id' => $request->book_id,
        'total_amount' => $totalAmount
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Transaction created successfully',
        'data' => $transactions
    ], 201);
 }

    // function untuk menampilkan data berdasarkan id
    public function show($id)
    {
    $transaction = Transaction::with('user', 'book')->find($id);

    if (!$transaction) {
        return response()->json([
            'success' => false,
            'message' => 'Transaction not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Transaction retrieved successfully',
        'data' => $transaction
    ], 200);
    }


    // function untuk mengupdate data
    public function update(Request $request, $id)
{
    // 1. Cari transaksi
    $transaction = Transaction::find($id);
    if (!$transaction) {
        return response()->json([
            'success' => false,
            'message' => 'Transaction not found'
        ], 404);
    }

    // 2. Validasi input
    $validator = Validator::make($request->all(), [
        'quantity' => 'required|integer|min:1'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'data' => $validator->errors()
        ], 422);
    }

    $book = Book::find($transaction->book_id);
    if (!$book) {
        return response()->json([
            'success' => false,
            'message' => 'Book not found'
        ], 404);
    }

    // Hitung ulang total berdasarkan quantity baru
    $newQuantity = $request->quantity;

    // Ambil total amount lama
    $oldTotal = $transaction->total_amount;

    // Hitung quantity lama berdasarkan harga
    $oldQuantity = $book->price > 0 ? intval($oldTotal / $book->price) : 0;

    $stockDifference = $newQuantity - $oldQuantity;

    // Cek stok cukup
    if ($stockDifference > 0 && $book->stock < $stockDifference) {
        return response()->json([
            'success' => false,
            'message' => 'Stok buku tidak cukup untuk update quantity'
        ], 400);
    }

    // Update stok
    $book->stock -= $stockDifference;
    $book->save();

    // Update total harga saja (tanpa update quantity)
    $transaction->total_amount = $book->price * $newQuantity;
    $transaction->save();

    return response()->json([
        'success' => true,
        'message' => 'Transaction updated successfully (without saving quantity)',
        'data' => $transaction
    ], 200);
}


    // function untuk menghapus data
    public function destroy(string $id) {
    $transaction = Transaction::find($id);

    if (!$transaction) {
        return response()->json([
            "success" => false,
            "message" => 'Resource not found'
        ], 404);
    }

    $transaction->delete();

    return response()->json([
        "success" => true,
        "message" => 'Delete resource Succesfully',
    ]);
  }

}
