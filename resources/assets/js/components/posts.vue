<template>
     <div class="post-preview">
           <a href=" slug ">
              <h2 class="post-title">
                {{title}}
              </h2>
              <h3 class="post-subtitle">
                {{subtitle}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Start Bootstrap</a>
              Created at {{created_at}} <small>0</small> <a href=""><span class="fa fa-thumbs-up" aria-hidden="true">Like</span></a></p>

          </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
