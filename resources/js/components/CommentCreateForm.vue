<template>
    <form method="post" action="{{ route('reply.add') }}">
           @csrf
           <div v-if="isGif" class="form-group">
               <img :src="comment" />
               <input type="text" name="comment_body" class="form-control" />
               <div id="app">
               <input type="hidden" name="post_id" value="{{ $post_id }}" />
               <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
           </div>
           <div class="form-group">
               <input type="submit" class="btn btn-warning" value="Reply" />
           </div>
       </form>
</template>

<script>
export default {
  name: "comment-create-form",
  props: ["commentUrl"],
  computed: {
    comment: {
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
      this.comment = "";
    }
  },
  data() {
    return {
      isGif: false
    };
  }
};
</script>