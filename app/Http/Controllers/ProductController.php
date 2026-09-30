<?php
    namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class ProductController extends Controller
    {
        private array $products = [
            [
                'id' => 1,
                'name' => 'Produit 1',
                'price' => 10.99,
                'stock' => 100,
                'description' => 'Description du produit 1',
            ],
            [
                'id' => 2,
                'name' => 'Produit 2',
                'price' => 19.99,
                'stock' => 50,
                'description' => 'Description du produit 2',
            ],
            [
                'id' => 3,
                'name' => 'Produit 3',
                'price' => 5.99,
                'stock' => 200,
                'description' => 'Description du produit 3',
            ]            
        ];
        public function index(): View
        {
            return view('products.index', [
                'products' => $this->products,
            ]); 
        }
    
        public function search(Request $request): View
        {
            $query = trim($request->query('q', ''));

            $products = $query === ''
                ? collect()
                : Product::where('name', 'like', "%{$query}%")
                    ->orderBy('name')
                    ->get();

                return view('products.search', [
                    'products' => $products,
                    'query' => $query,
                ]);
        }

        public function show(string $id): View
        {
            $product = collect($this->products)->firstWhere('id', (int) $id);

            abort_if (!$product, 404);

            return view('products.show', [
                'product' => $product,
            ]);
        }
    }
