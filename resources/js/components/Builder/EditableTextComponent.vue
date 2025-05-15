<template>
  <div>
    <!-- Bind the value of the input to the "content" prop -->
    <textarea
      :value="content"
      @input="$emit('update:content', $event.target.value)"
    />
  </div>
</template>

<script>
export default {
  name: "EditableTextComponent",
  props: {
    content: String, // The content prop is passed from the parent
  },
};
</script>