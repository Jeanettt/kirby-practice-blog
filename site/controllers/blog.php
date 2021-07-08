<?php

return function ($page) {
    $articles = collection('blog-collection')->flip()->paginate(3);
    $pagination = $articles->pagination();

    return [
        'articles' => $articles,
        'pagination' => $pagination,
    ];

};