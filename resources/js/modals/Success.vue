<template>
  <div
    class="modal fade"
    :id="id"
    tabindex="-1"
    role="dialog"
    :aria-labelledby="id"
    aria-hidden="true"
    @click="redirect"
  >
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(73, 187, 90);">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
          <div>
            <h5>Sucesso ao Cadastrar</h5>
            <p>
            Agora é possível cadastrar especificações técnicas, estruturas e observações.
            </p>
          </div>
        </center>
        </div>
        <div class="modal-footer">
          <button type="button"data-dismiss="modal"  class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VTextarea from "@/js/components/Textarea";
import axios from "axios";

export default {
  components: { VTextarea },
  props: ["value"],
  data() {
    return {
      id: "modal-success",
      form: {
      }
    };
  },
  methods: {
    redirect(){
      this.$router.push('/produto/' + this.value);
    }
  },
  mounted() {
  }
};
</script>

<style scoped>
p {
  margin-bottom: 0.5rem;
}

.row.row-separator::after {
  margin: 10px 1rem 0;
}
</style>
