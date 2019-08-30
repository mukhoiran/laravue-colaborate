<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Laravel + Vue</title>
    </head>
    <body>
      <div id="app" class="p-5">
        <input type="text" v-model="search" placeholder="search news base on title" class="form-control mb-5">
        <div v-for="(n, index) in filternews" class="mb-5"></div>
        <h2 class="alert alert-secondary">@{{n.title}}</h2>
        <p class="text-justify">@{{n.content}}</p>
        <p class="blockquote-footer text-right">@{{n.created_at}}</p>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/vue"></script>
      <script>
        new Vue({
          el:'#app',
          data: {
            search:'',
            news: <?php echo DB::table('news')->get(); ?>,
            computed: {
              filternews: function(){
                return this.news.filter((n) => {
                  return n.title.toLowerCase().match(this.search.toLowerCase());
                });
              }
            }
          }
        })
      </script>
    </body>
</html>
