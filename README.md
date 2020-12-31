## Local Testing Setup

```
> git clone

> composer install

> Update env db:  cp .env.example .env.

> php artisan migrate

> php artisan db:seed

> php artisan serve

```

## API notes

### Get News

```
Paginated
> /api/news?per_page=3  // Dynamic per page , default is 10

Sorting
> /api/news?sort=-title  // Sort news by "title" descending, remove '-' sign to sort ascending order

Filtering
> /api/news?filter[title]=myarticle  // Filter new by title
> /api/news?filter[article]=somecontent  // Filter new by article content


All: Paginate, Filtered, Sorted
> /api/news?per_page=5&sort=title&filter[title]=newsTitle
```

### Create News

```
> METHOD: Post

> URL : /api/news

> Example JSON {
    "title" : "MY First News",
    "article" : "Sample News Article Content",
    "is_published" : 1
}
```

### Update News

```
> METHOD: Put

> URL : /api/news/<id>

> Example JSON {
    "title" : "MY Updated News",
    "article" : "Sample News Article Content Updated",
    "is_published" : 0
}
```

### Delete News

```
> METHOD: Delete
> URL : /api/news/<id>

```
