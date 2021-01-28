<?php

function article_excerpt($limit = 140, $suffix = '…') {
    //  Get the article HTML to check
    $content = strip_tags(article_html());
    $len = strlen($content);

    $words = preg_split('/\s+/', $content, null, PREG_SPLIT_NO_EMPTY);

    if($len < $limit) {
        return $content;
    }

    return implode(' ', array_slice($words, 0, 30)) . $suffix;
}

function video($args){

    if( article_custom_field('youtube_id')){
        
        $video = sprintf(
            '<iframe width="560" height="315" src="https://www.youtube.com/embed/%s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            article_custom_field('youtube_id')
        );

        return $video;
    }
}

function get_shortcodes(){
    return [
        'video' => 'video'
    ];
}

function render_article() {

    $shortcode_tags = get_shortcodes();

    $content = article_html();

    if(preg_match_all("/\[.*\]/i", $content, $matches)){
        foreach($matches as $match){
            $shortcode = explode(' ', trim($match[0], '[]'))[0];
            if(is_callable($shortcode_tags[$shortcode])){
                $content = preg_replace_callback("/\[" . $shortcode . ']/i', $shortcode_tags[$shortcode], $content);
            }
        }
    }


	return $content;
}