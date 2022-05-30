<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Category::factory(5)->create();
        Product::factory(100)->create();
        ProductImage::factory(200)->create();*/

        $categories = Category::factory(5)->create();
        $categories->each(function ($category) {
           $products =  Product::factory(20)->make();
           $category->products()->saveMany($products);

            $products->each(function ($product) {
              $images =  ProductImage::factory(5)->make();
              $product->images()->saveMany($images);
           });

        });

//        $categories = Category::factory()->count(5)->create();
//
//        $categories->each(function ($category) {
//           $products = Product::factory()->count(20)->make();
//           $category->products()
//        });




        //------------------------
//        $user = User::factory()->create();
//
//        $posts = Post::factory()
//            ->count(3)
//            ->for($user)
//            ->create();

        //------------------------

//        $user = User::factory()
//            ->has(
//                Post::factory()
//                    ->count(3)
//                    ->state(function (array $attributes, User $user) {
//                        return ['user_type' => $user->type];
//                    })
//            )
//            ->create();
        //------------------------



        // example from laravel documentation.
        /*$users = User::factory(3)
            ->create()
            ->each(function ($u) {
                $u->post()->save(Post::factory()->make());
            });*/
    }
}
