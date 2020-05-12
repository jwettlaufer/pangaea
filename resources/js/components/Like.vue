<template>
  <div>
    <a href="#" v-if="isLiked" @click.prevent="unLike(post)">
      <i class="fa fa-heart fa-lg" aria-hidden="true" style="color: red;"></i>
      </a>
    <a href="#" v-else @click.prevent="like(post)">
      <i class="fa fa-heart-o fa-lg" aria-hidden="false"></i>
    </a>
  </div>
</template>
<script>
export default {
  name: "Like",
  props: ["post", "liked"],
  data() {
    return {
      isLiked: ""
    };
  },
  mounted() {
    this.isLiked = this.isLike ? true : false;
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
        .then(response => (this.isLiked = true))
        .catch(response => console.log(response.data));
    },
    unLike(post) {
      axios
        .post("/pangaea/public/unlike/" + post)
        .then(response => (this.isLiked = false))
        .catch(response => console.log(response.data));
    }
  }
};
</script>
<style>
</style>