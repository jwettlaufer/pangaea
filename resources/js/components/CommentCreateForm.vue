<template>
  <form method="POST" :action="commentUrl">
    <slot></slot>
    <div v-if="isGif" class="form-group">
      <div>
        <img :src="body" />
        <button type="button" class="btn btn-warning" @click="resetMessage">Reset</button>
        <input type="hidden" name="post_id" :value="postId" />
        <input type="hidden" name="comment_body" v-model="body" />
        <input type="hidden" name="is_gif" :value="isGif" />
      </div>
    </div>
    <div v-else class="form-group">
      <label for="body">
        <input type="text" name="comment_body" class="form-control" v-model="body" />
        <input type="hidden" name="post_id" :value="postId" />
      </label>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-warning" value="Add Comment" />
    </div>
  </form>
</template>

<script>
export default {
  name: "comment-create-form",
  props: ["commentUrl", "postId"],
  computed: {
    body: {
      get() {
        this.isStringAGIFUrl(this.$attrs.value);
        return this.$attrs.value;
      },
      set(value) {
        this.$emit("input", value);
      }
    }
  },
  methods: {
    isStringAGIFUrl(string) {
      if (string.includes("http") && string.includes(".gif")) {
        this.isGif = true;
        return true;
      }
      this.isGif = false;
      return false;
    },
    resetMessage() {
      this.body = "";
    }
  },
  data() {
    return {
      isGif: false
    };
  }
};
</script>