<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function render()
    {
        $categoies =Category::orderBy('id','DESC')->paginate(1);
        return view('livewire.admin.category.index',['categoies'=>$categoies]);
    }

    public function deleteCategory($category_id)
    {
          // dd($category_id);
        $this->category_id =$category_id;
    }

    public function destroyCategory(){
        $category =Category::find($this->category_id);
        $path ='uploads/category/'.$category->image;
        if(File::exists($path))
        {
          File::delete($path);
        }

        $category->delete();
        session()->flash('message','Category Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
}
