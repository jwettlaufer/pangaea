<template>
  <div>
    <a href="#" v-if="isLiked" @click.prevent="unLike(post)">
      <i class="fa fa-heart fa-lg" aria-hidden="true" style="color: red;"></i>
    </a>
    <a href="#" v-else @click.prevent="like(post)">
      <i class="fa fa-heart-o fa-lg" aria-hidden="false"></i>
    </a>
    <p class="pull-right">{{likeCount}}</p>
  </div>
</template>
<script>
export default {
  name: "Like",
  props: ["post", "liked"],
  data() {
    return {
      isLiked: "",
      likeCount: ""
    };
  },
  mounted() {
    this.isLiked = this.isLike ? true : false;
    this.getLikeCount(this.post);
  },
  computed: {
    isLike() {
      return this.liked;
    }
    
  },
  methods: {
    like(post) {
      axios
        .post("/pangaea/public/like/" + post)
        .then(response => {this.isLiked = true; this.getLikeCount(post)})
        .catch(response => console.log(response.data));
    },
    unLike(post) {
      axios
        .post("/pangaea/public/unlike/" + post)
        .then(response => {this.isLiked = false; this.getLikeCount(post)})
        .catch(response => console.log(response.data));
    },
    getLikeCount(post) {
      axios
        .get("/pangaea/public/like/" + post)
        .then(response => (this.likeCount = response.data));
    }
  }
};
</script>
<style>
</style>