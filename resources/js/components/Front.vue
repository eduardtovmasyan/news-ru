<template>
<div>
            <div class="profiles-details" v-if="news">
                <div class="section-heading text-center">
                    <h2>news</h2>
                </div>
                <div class="container">
                    <div class="profiles-content">
                        <div class="row">
                            <div class="col-sm-3" v-for="item in news">
                                <div class="single-profile profile-no-border">
                                    <div class="profile-txt">
                                        <a href=""><i class="flaticon-github-logo"></i></a>
                                        <div  v-if="item.title.length < 20"> {{ item.title }}</div>
  										<div  v-else>{{ item.title.substring(0,20)+".." }}</div>
                                    </div>
                                    <div class="single-profile-overlay">
                                        <div class="profile-txt">
                                            <a href="item.url"><i class="flaticon-github-logo"></i></a>
                                            <div class="profile-icon-name">{{ item.description }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
</div>
</template>
<script>
export default{
        data(){
            return {
                news: null,
                info: null,
                selectedType: 'Political',
                type_id: 5,
                details: null,
                next: '',
                prev: '',
                currentPage: null,
                page: true
            }
        },
        mounted() {
            axios.get('api/news',  
              {
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
              }
              })
              .then(response => {
               		this.news = response.data.data;
               		console.log(this.news)
              })

        },
        methods:{
          
        }
}
</script>
