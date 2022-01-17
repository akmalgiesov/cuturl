<template>
  <div class="uk-child-width-1-1@m uk-grid-match" uk-grid>
  <div>
  <div class="uk-card uk-card-body uk-card-default uk-box-shadow-medium uk-border-rounded uk-padding-small">
    <div class="uk-flex uk-flex-middle" uk-grid>
      <div class="uk-width-expand@m">
      <input class="uk-input" type="text" v-model="url" v-on:focus="clear()">
      </div>
      <div>
        <a class="uk-button uk-button-primary uk-border-rounded" v-on:click="validate()">Сократить  ссылку</a>
      </div>
    </div>
  </div>
  </div>

  <div>
  <div class="uk-card uk-card-body uk-padding-small uk-text-center">
    <div uk-spinner="ratio: 1" v-if="isLoading"></div>
    <a v-bind:href="shortUrl" target="_blank" v-if="!isLoading">{{shortUrl}}</a>
    <p class="uk-text-danger uk-text-center uk-margin-remove-top">{{message}}</p>
  </div>
  </div>
</div>
</template>

<script>
export default{

  data: function () {
    return {
      url:'',
      shortUrl:'',
      isLoading: false,
      message:''
    }
  },

  methods:{
  getShortUrl(){
    let self = this;
    self.isLoading = true;
    axios({
    method: 'POST',
    url: '/app/cuturl',
    headers:{
      'X-CSRF-TOKEN': document.head.querySelector('head meta[name="csrf-token"]').content
    },
    data:{
      url: self.url
    }
    })
    .then(function (response){
      self.isLoading = false;
      self.shortUrl = response.data;
    });
  },

  validate(){
    this.url === '' ? this.message = 'Поле пустое, введите ссылку!' :
    this.url.split('.').length < 2 ? this.message = 'Пожалуйста, введите ссылку корректно!':
    this.getShortUrl();
  },

  clear(){
    this.message = '';
    this.shortUrl != '' ? this.shortUrl = '' : '';
  },


  }
}
</script>
