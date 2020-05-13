<template>
  <form method="POST" :action="replyUrl">
    <slot></slot>
    <div v-if="isGif" class="form-group">
      <div>
        <img :src="bodyReply" />
        <button type="button" class="btn btn-warning" @click="resetMessage">Reset</button>
        <input type="hidden" name="post_id" :value="postId" />
        <input type="hidden" name="comment_id" :value="commentId" />
        <input type="hidden" name="comment_body" v-model="bodyReply" />
        <input type="hidden" name="is_gif" :value="isGif" />
      </div>
    </div>
    <div v-else class="form-group">
      <label for="bodyReply">
        <textarea type="text" rows="1" cols="100" name="comment_body" class="form-control" v-model="bodyReply"></textarea>
        <input type="hidden" name="post_id" :value="postId" />
        <input type="hidden" name="comment_id" :value="commentId" />
      </label>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-warning btn-sm" value="Add Reply" />
    </div>
  </form>
</template>

<script>
export default {
  name: "reply-create-form",
  props: ["replyUrl", "postId", "commentId"],
  computed: {
    bodyReply: {
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
      this.bodyReply = "";
    }
  },
  data() {
    return {
      isGif: false
    };
  }
};
</script>