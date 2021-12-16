<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       
       $first= factory(Post::class)->create();
       $second= factory(Post::class)->create();

        Post::archives();
        
        

    }
}


//===========Old code=============

 //$this->assertTrue(true);