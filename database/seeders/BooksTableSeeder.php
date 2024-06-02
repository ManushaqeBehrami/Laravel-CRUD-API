<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'description' => 'A novel set in the Jazz Age that tells the story of the mysterious Jay Gatsby and his unrequited love for Daisy Buchanan.'
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'description' => 'A novel about the serious issues of rape and racial inequality, but also filled with warmth and humor.'
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'description' => 'A dystopian novel that explores the dangers of totalitarianism and extreme political ideology.'
        ]);

        Book::create([
            'title' => 'Pride and Prejudice',
            'author' => 'Jane Austen',
            'description' => 'A romantic novel that also critiques the British landed gentry at the end of the 18th century.'
        ]);

        Book::create([
            'title' => 'Moby-Dick',
            'author' => 'Herman Melville',
            'description' => 'A novel about the voyage of the whaling ship Pequod, led by Captain Ahab who is intent on finding the giant white whale, Moby Dick.'
        ]);
    }
}
