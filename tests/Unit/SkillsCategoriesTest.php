<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Skillcategory;
use App\Models\Skill;
use App\Models\Discipline;
use Illuminate\Support\Facades\Schema;

class SkillsCategoriesTest extends TestCase
{
    // use RefreshDatabase, WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function skill()
    // {
    //     return $this->hasMany('App\Models\Skill','skill_category_id','id');
    // }
  
    public function testing()
    {
        $this->assertTrue( 
            Schema::hasColumns('skillcategories', [
                'id',
              'discipline_id',
              'skill_category_name',
              'skill_category_decsription',
              'description_Fr',
              'description_Ar',
              'version',
              'sort_order',
              'duration',
              'moderatedby',
              'approve_status',
              'publish_status',
              'createdby',
              'updatedby',
              'origin_id'
          ]), 1);
    //   $discipline    = factory(Discipline::class)->create(); 
        $SkillCategory    = factory(Skillcategory::class)->create(); 
        $Skill    = factory(Skill::class)->create(['skill_category_id' => $SkillCategory->id]);
       
   
       
        // $this->assertTrue($SkillCategory->skills->contains($Skill));
        
        // Method 1: Count that a post comments collection exists.
        // $this->assertEquals(1, $post->comments->count());
        $this->assertEquals(1, $SkillCategory->Skill->count());
        // Method 3: Comments are related to posts and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $SkillCategory->Skill);
        // $this->assertTrue(true);
    }
   
}
