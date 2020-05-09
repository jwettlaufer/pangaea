<template>
  <div>
    <a href="#" v-if="isLiked" @click.prevent="unLike(post)">
      <button class="btn" type="submit">UnLike</button>
    </a>
    <a href="#" v-else @click.prevent="like(post)">
      <button class="btn" type="submit">Like</button>
    </a>
  </div>
</template>

<script>
export default {
  name: "Like",
  props: ["post", "liked"],
  data: function() {
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
    toggleLike: function() {
      if (this.liked) {
        this.unlike();
      } else {
        this.like();
      }
    },
    like(post) {
      this.text = "Unlike";
      axios
        .post("/like/" + post)
        .then(response => (this.isLiked = true))
        .catch(response => console.log(response.data));
    },
    unLike(post) {
      this.text = "Like";
      axios
        .post("/unlike/" + post)
        .then(response => (this.isLiked = false))
        .catch(response => console.log(response.data));
    }
  }
};
</script>
<style>
</style>