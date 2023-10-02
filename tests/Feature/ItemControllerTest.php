<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_method_displays_all_items()
    {
        // Arrange: Create some test data
        $item = Item::factory()->create([
            'name' => 'TestItem',
            'description' => 'TestDescription',
            'date_field' => now(),
        ]);

        // Act: Visit the index page
        $response = $this->get(route('items.index'));

        // Assert: Check if the view is returned and data is available
        $response->assertStatus(200);
        $response->assertViewHas('items');
    }
    public function test_create_method_displays_create_form()
    {
        // Act: Visit the create page
        $response = $this->get(route('items.create'));

        // Assert: Check if the view is returned
        $response->assertStatus(200);
    }

    public function test_store_method_adds_new_item_and_redirects()
    {
        // Arrange: Prepare valid data
        $data = [
            'name' => 'NewItem',
            'description' => 'NewDescription',
            'date_field' => now()->toDateString(),
        ];

        // Act: Post the data
        $response = $this->post(route('items.store'), $data);

        // Assert: Check if the data was saved and redirected
        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseHas('items', $data);
    }
    public function test_edit_method_displays_edit_form()
    {
        // Arrange: Create test data
        $item = Item::factory()->create();

        // Act: Visit the edit page
        $response = $this->get(route('items.edit', $item->id));

        // Assert: Check if the view is returned and data is available
        $response->assertStatus(200);
        $response->assertViewHas('item');
    }
    public function test_update_method_modifies_item_and_redirects()
    {
        // Arrange: Create test data and prepare update data
        $item = Item::factory()->create();
        $data = [
            'name' => 'UpdatedItem',
            'description' => 'UpdatedDescription',
            'date_field' => now()->toDateString(),
        ];

        // Act: Update the item
        $response = $this->put(route('items.update', $item->id), $data);

        // Assert: Check if the item was updated and redirected
        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseHas('items', $data);
    }

    public function test_destroy_method_deletes_item_and_redirects()
    {
        // Arrange: Create test data
        $item = Item::factory()->create();

        // Act: Delete the item
        $response = $this->delete(route('items.destroy', $item->id));

        // Assert: Check if the item was deleted and redirected
        $response->assertRedirect(route('items.index'));
        $this->assertDatabaseMissing('items', ['id' => $item->id]);
    }


}
