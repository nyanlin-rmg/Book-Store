<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Order;
use App\Book;
use RealRashid\SweetAlert\Facades\Alert;

class StoreController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('store.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view("store/show", ['book' => $book]);
    }

    public function addToCart($id)
    {
        $book = Book::findOrFail($id);
        $cart = session()->get('cart');

        if($cart == null) {
            $cart = [$id => ['id' => $id, 'name' => $book->title, 'quantity' => 1, 'price' => $book->price]];
            session()->put('cart', $cart);
            return redirect()->back()->with('status', "$book->title is successfully add to your cart!");
        } else {
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
                return redirect()->back()->with('status', "$book->title is successfully add to your cart!");
            } else {
                $cart[$id] = ['id' => $id, 'name' => $book->title, 'quantity' => 1, 'price' => $book->price];
                session()->put('cart', $cart);
                return redirect()->back()->with('status', "$book->title is successfully add to your cart!");
            }
        }
    }

    public function cart()
    {
        $carts = session()->get('cart');
        $total_quantity = 0;
        $total_price = 0;
        if ($carts != null) {
            foreach($carts as $cart) {
                $total_quantity += $cart['quantity'];
                $total_price += $cart['price'] * $cart['quantity'];
            }
        }
        return view('store/cart', ['carts' => $carts, 'total_quantity' => $total_quantity, 'total_price' => $total_price]);
    }

    public function removeFromCart($id)
    {
        $carts = session()->get('cart');
        if ($carts[$id]['quantity'] <= 1) {
            unset($carts[$id]);
        } else {
            $carts[$id]['quantity']--;
    }
        session()->put('cart', $carts);
        return redirect()->back();
    }

    public function order(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string'
        ]);

        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 0
        ]);
        $order->save();

        $carts = session()->get('cart');
        foreach ($carts as $cart) {
            $book = Book::find($cart['id']);
            $book->order()->attach($order->id, ['quantity' => $cart['quantity']]);
        }
        session()->forget('cart');
        Alert::success('Thank You!', 'Your order is submitted, we will contact you soon');
        return redirect('store');
    }

    public function selectCategory(Category $category)
    {
        $books = Book::all()->where('category_id', $category->id);
        return view('store.index', ['books' => $books]);
    }

    public function selectAuthor(Book $book)
    {
        $books = Book::all()->where('author', $book->author);
        return view('store.index', ['books' => $books]);
    }
}
