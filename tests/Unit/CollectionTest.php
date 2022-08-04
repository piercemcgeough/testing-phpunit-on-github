<?php


use App\Models\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    /** @test */
    public function constructor()
    {
        $collection = new Collection();

        $this->assertInstanceOf(Collection::class, $collection);
    }

    /** @test */
    public function an_empty_collection_returns_no_items()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_to_collection()
    {
        $collection = new Collection([
            1, 2, 3
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_equal_items_passed()
    {
        $collection = new Collection([
            'one', 'two',
        ]);

        $this->assertCount(2, $collection->get());
        $this->assertEquals('one', $collection->get()[0]);
        $this->assertEquals('two', $collection->get()[1]);
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iteratored()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new Collection(['one', 'two', 'three']);
        $collection2 = new Collection([4, 5, 6]);

        $collection1->merge($collection2);

        $this->assertCount(6, $collection1->get());
        $this->assertEquals(6, $collection1->count());
    }

    /** @test */
    public function can_add_existing_collection()
    {
        $collection = new Collection(['one', 'two', 'three']);
        $collection->add(['four']);

        $this->assertCount(4, $collection->get());
        $this->assertEquals(4, $collection->count());
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            ['name' => 'pierce'],
            ['name' => 'aodh']
        ]);

        $json = '[{"name":"pierce"},{"name":"aodh"}]';

        $this->assertEquals($json, $collection->toJson());
        $this->assertJson($json, $collection->toJson());
    }

    /** @test */
    public function json_encoding_the_collection_returns_json()
    {
        $collection = new Collection([
            ['name' => 'pierce'],
            ['name' => 'aodh']
        ]);

        $json = '[{"name":"pierce"},{"name":"aodh"}]';

        $encoding = json_encode($collection);

        $this->assertEquals($json, $encoding);
        $this->assertJson($json, $encoding);
    }
}