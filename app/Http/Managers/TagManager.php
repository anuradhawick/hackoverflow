<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/3/16
 * Time: 22:58
 */

namespace App\Http\Managers;


use App\Tag;

class TagManager
{
    /**
     * Get the tags from the database or create and return array of Tag models
     *
     * Tags are saved as lower case strings and are not allowed to be replicated in the DB
     *
     * @param $tagsString
     * @return array
     */
    public static function getTagsArray($tagsString)
    {
        $tags = explode(',', $tagsString);
        $out = array();
        foreach ($tags as $tag) {
            $tag = trim(strtolower($tag));
            if ($tagDB = Tag::where('tag', $tag)->first()) {
                array_push($out, $tagDB);
            } else {
                $tagDB = new Tag();
                $tagDB->tag = $tag;
                array_push($out, $tagDB);
            }
        }
        return $out;
    }
}