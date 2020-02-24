<?php

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//********************************CATEGORY**********************************************

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

//********************************POSTS**********************************************

        $post1 = Post::create([

            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Some Descriptions Here ........................',
            'subtitle' => 'User more Content --------------------------------',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);

        $post2 = Post::create([

            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Some Descriptions Here ........................',
            'subtitle' => 'User more Content --------------------------------',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);

        $post3 = Post::create([

            'title' => 'Best practices for minimalist design with example',
            'description' => 'Some Descriptions Here ........................',
            'subtitle' => 'User more Content --------------------------------',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);

        $post4 = Post::create([

            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Some Descriptions Here ........................',
            'subtitle' => 'User more Content --------------------------------',
            'category_id' => $category3->id,
            'image' => 'posts/4.jpg'
        ]);

//********************************TAGS**********************************************

        $tag1 = Tag::create([
            'name' => 'Job'
        ]);

        $tag2 = Tag::create([
            'name' => 'Customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'Design'
        ]);

        $tag4 = Tag::create([
            'name' => 'Offer'
        ]);

        $tag5 = Tag::create([
            'name' => 'Version'
        ]);

        $tag6 = Tag::create([
            'name' => 'Record'
        ]);


        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag3->id, $tag4->id]);
        $post3->tags()->attach([$tag5->id, $tag6->id]);
        $post4->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
    }
}
