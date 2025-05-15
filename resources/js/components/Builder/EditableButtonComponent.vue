<template>
  <div>
    <!-- Bind the button label to the "content" prop -->
    <button>{{ content }}</button>
    <!-- Emit an event when the input changes -->
    <input
      type="text"
      :value="content"
      @input="$emit('update:content', $event.target.value)"
      placeholder="Button Text"
    />
  </div>
</template>

<script>
export default {
  name: "EditableButtonComponent",
  props: {
    content: String, // This prop is passed down from the parent component
  },
};
</script>