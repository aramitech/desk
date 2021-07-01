<template>
    <div class="modal fade" id="addbookmarkers" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Bookmarkers</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                   <div class="trf">        <div class="form-group row"> 
 <div class="col-md-6">
            <label for="company_id"> Licensee Name</label>        
            <multiselect   v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="false" :multiple="false"  :searchable="true" :close-on-select="true" :show-labels="false"  :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
        </div> 
           <div class="col-md-6">

               <label for="shop_id"> Shop</label>        
            <multiselect  name="shop_id" v-model="fields.shop_id"   label="shop_name" placeholder="Select Shop name" :options="shop_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" >
              
            </multiselect>
            <div v-if="errors && errors.shop_id" class="text-danger">{{ errors.shop_id[0] }}</div>
         
							<!-- <label>Licensee Name</label> -->
							<input class="form-control" name="licensee_name" v-model="fields.licensee_name" type="hidden" placeholder="Licensee Name" required>
                            <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
						</div>
        
         </div>


  <div class="form-group row">
					<div class="col-md-6">
							<label>Trading Name</label>   
							<input class="form-control" name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                      <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div></div></div>
                        <div class="trf">  
    <div class="form-group row">                      
                        <div class="col-md-4">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" value="" type="date" placeholder="Return For The Period Of">
                            <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
						</div>
                       <div class="col-md-4">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" value="" type="date" placeholder="Return For The Period To">
                            <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
						</div>
                        
                                <div class="col-md-4">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date" value="" type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>	</div>
                        </div>
       <div class="trf"> 
<div class="form-group row">  
      <div class="col-md-3">
							<label>Bets No</label>
							<input class="form-control"  name="bets_no" v-model="fields.bets_no" value="" type="text" placeholder="bets_no" required>
                            <div v-if="errors && errors.bets_no" class="text-danger">{{ errors.bets_no[0] }}</div>
						</div>
                           <div class="col-md-3">
							<label>Deposits</label>
							<input class="form-control"  name="deposits" v-model="fields.deposits" value="" type="text" placeholder="Deposits" required>
                            <div v-if="errors && errors.deposits" class="text-danger">{{ errors.deposits[0] }}</div>
						</div>
                     
                            <div class="col-md-3">
							<label>Total Sales</label>
							<input class="form-control" @keyup="sum" name="total_sales" v-model="fields.total_sales" value="" type="text" placeholder="total_sales" required>
                            <div v-if="errors && errors.total_sales" class="text-danger">{{ errors.total_sales[0] }}</div>
						</div>
                            <div class="col-md-3">
							<label>Total Payout</label>
							<input class="form-control" @keyup="sum" id="total_payout" name="total_payout" v-model="fields.total_payout" value="" type="text" placeholder="Total Payout" required>
                            <div v-if="errors && errors.total_payout" class="text-danger">{{ errors.total_payout[0] }}</div>
						</div></div>
  <div class="form-group row">                       
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht" value="" type="text" placeholder="WHT" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>GGR TAX</label>
							<input class="form-control"  name="winloss" v-model="fields.winloss" value="" type="hidden" :disabled="validated ? false : true" placeholder="winloss" >
                           
                           	<input class="form-control"  name="ggrtax" v-model="fields.ggrtax" value="" type="text" placeholder="ggrtax" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.ggrtax" class="text-danger">{{ errors.ggrtax[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control" @keydown="ggrtax" id="ggr" name="ggr" v-model="fields.ggr" value="ggr" type="text" placeholder="GGR" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
						</div></div>
                        
                    </div>
                    <div class="modal-footer"><div class="trf"> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>  </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

import Multiselect from 'vue-multiselect';

// register globally
Vue.component('multiselect', Multiselect)

export default {
  mixins: [ FormMixin ],
  components: { Multiselect },
  props:['data'],
data() {
    return {
        action: '/desk/public/bookmarkers/add', //save action
        text: 'Added Succesfully',
        redirect: '/desk/public/bookmarkers',

    company_names: [],
    shop_names: [],
      fields: {
        license_no:"",
        trading_name:'',
        licensee_name:'',

                ggr : '',
                total_payout: '',              
      }
        }
    },

        methods: {
        getLicenseeName: function(){
        axios.get('/desk/public/license_name/get')
        .then(function(response){
          this.company_names = response.data;   
        }.bind(this));
      },
       getShop_Names: function(company_id){
        axios.get('/desk/public/bookmarker_shop_name/get?company_id='+company_id)
        .then(function(response){
          this.shop_names = response.data;        
        }.bind(this));
      },
   sum()
   {
     //  console.log("a" +this.fields.ggr +  " b " +this.fields.total_payout);
  this.fields.ggr=this.fields.total_sales - this.fields.total_payout;
  this.fields.wht=0.2 * this.fields.total_payout;
  this.fields.ggrtax=0.15 * this.fields.ggr;  
   
   },
      ggrtax()
   {
 this.fields.ggrtax=0.15 * this.fields.ggr;  
   },
 onChange (value) {
      this.value = value;
      this.getShop_Names(value.company_id)
    this.fields.license_no=this.value.license_no;
       this.fields.trading_name=this.value.trading_name;
     this.fields.licensee_name=this.value.company_name;
     this.fields.shop_id = value.shopcompany;
    console.log(value)
    },
   
     },
     computed: {
                ggr: function(){
                 this.fields.ggr = this.total_payout * 0.2;           

                    return this.ggr * this.total_payout;
                },
            },
    created: function(){  

     this.getLicenseeName() ; 
    },
     mounted() {
        //this.ggr = this.total_payout * 0.2;
  }
}
</script>


<!--Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
