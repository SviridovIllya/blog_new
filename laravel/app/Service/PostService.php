<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }


            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            }

            $post = Post::firstOrCreate($data);
            if (isset($tagsIds)) {
                $post->tags()->attach($tagsIds);

            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);

        }
    }

    public function updata($data, $post)
    {
        try {
            Db::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagsIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post->update($data);
            if (isset($tagsIds)) {
                $post->tags()->attach($tagsIds);

            }
            $post->tags()->sync($tagsIds);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;

    }

}
