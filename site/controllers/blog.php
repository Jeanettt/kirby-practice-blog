<?php

return function ($page) {
    $articles = collection('blog-collection')->flip()->paginate(6);
    $pagination = $articles->pagination();

    return [
        'articles' => $articles,
        'pagination' => $pagination,
    ];

};