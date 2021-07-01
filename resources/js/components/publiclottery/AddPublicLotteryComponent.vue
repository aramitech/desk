<template>
    <div class="modal fade" id="addpubliclottery" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Publlic Lottery</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                         <div class="trf"> 
                        <div class="form-group row">
                        
                       <div class="col-md-6">
            <label for="company_id"> Operator Name</label>        
            <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
           
        </div> 
                      <div class="col-md-6">
							<label>Lottery Name</label>
					      
            <multiselect  name="publiclotterynumber_id" v-model="fields.publiclotterynumber_id"   label="lottery_name" placeholder="Select Lottery name" :options="Lottery_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" >
              
            </multiselect>
            <div v-if="errors && errors.publiclotterynumber_id" class="text-danger">{{ errors.publiclotterynumber_id[0] }}</div>
       	</div>  
               
                  
                    <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no"  type="text" placeholder="License No" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div>  
                             <div class="col-md-6">
							<label>Trading As</label>
							<input class="form-control"  name="trading_name" v-model="fields.trading_name"  type="text" placeholder="Trading As" :disabled="validated ? false : true" required>
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                        </div>    </div> 
                          <div class="trf">  
                           <div class="form-group row">
                        <div class="col-md-4">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_of" v-model="fields.return_for_of"  type="date" placeholder="Return For The Period Of" >
                            <div v-if="errors && errors.return_for_of" class="text-danger">{{ errors.return_for_of[0] }}</div>
						</div>
                       <div class="col-md-4">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_to" v-model="fields.return_to"  type="date" placeholder="Return For The Period To" >
                            <div v-if="errors && errors.return_to" class="text-danger">{{ errors.return_to[0] }}</div>
						</div>
                            <div class="col-md-4">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date"  type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
                        </div> </div>
                        <div class="trf">  
                          <div class="form-group row">
                          
                             <div class="col-md-4">
							<label>Total Tickets Sold</label>
							<input class="form-control"  name="total_tickets_sold" v-model="fields.total_tickets_sold"  type="text" placeholder="Total Tickets Sold" required>
                            <div v-if="errors && errors.total_tickets_sold" class="text-danger">{{ errors.total_tickets_sold[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>Sales</label>
							<input class="form-control" @keyup="sum" name="sales" v-model="fields.sales"  type="text" placeholder="Sales" required>
                            <div v-if="errors && errors.sales" class="text-danger">{{ errors.sales[0] }}</div>
						</div>
                            <div class="col-md-4">
							<label>Payouts</label>
							<input class="form-control"  @keyup="sum" name="payouts" v-model="fields.payouts"  type="text" placeholder="Payouts" required>
                            <div v-if="errors && errors.payouts" class="text-danger">{{ errors.payouts[0] }}</div>
						</div>
                         <div class="col-md-4">
									</div>
                        
                        </div>
                              <div class="form-group row">
                           
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht"  type="text" :disabled="validated ? false : true" placeholder="WHT" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>
                       
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control"  name="ggr" v-model="fields.ggr"  type="text" :disabled="validated ? false : true" placeholder="GGR" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
                        
                             <div class="col-md-4">
							<label>GGR TAX</label>
							<input class="form-control"  name="ggrtax" v-model="fields.ggrtax"  type="text" :disabled="validated ? false : true" placeholder="GGR TAX" required>
                            <div v-if="errors && errors.ggrtax" class="text-danger">{{ errors.ggrtax[0] }}</div>
						</div>
                        
                        </div>  </div>
                        
                    </div>
                    <div class="modal-footer"> <div class="trf">  
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
export default {
  mixins: [ FormMixin ],
  components: { Multiselect },
   props:['data'],
data() {
    return {
        action: '/desk/public/publiclottery/add', //save action
        text: 'Added Succesfully',
        redirect: '/desk/public/publiclottery',
           company_names: [],
            Lottery_names: [],
      fields: {
        license_no:"",
        trading_name:'',
        licensee_name:'',
        ggr:'',
        wht:'',
        payouts:'',
        ggrtax:'',
      }
        }
    },

methods: {
       getLottery_Names: function(company_id){
         axios.get('/desk/public/lotery_shop_name/get?company_id='+company_id)
        //axios.get('/lotery_shop_name/get')
        .then(function(response){
          this.Lottery_names = response.data;        
        }.bind(this));
      },
       getLicenseeName: function(){
        axios.get('/desk/public/publiclottery_license_name/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
   sum()
   {
  this.fields.ggr=this.fields.sales - this.fields.payouts;
  this.fields.wht=0.2 * this.fields.payouts;
  this.fields.ggrtax=0.15 * this.fields.ggr;  

   },

   
 onChange (value) {

  this.value = value
    this.fields.license_no=this.value.license_no;
       this.fields.trading_name=this.value.trading_name;
     this.fields.licensee_name=this.value.company_name


      this.getLottery_Names(value.company_id)
     this.fields.publiclotterynumber_id = value.Lotteryshopnumber;



    console.log(value)
    },
    },
        created: function(){  
     this.getLicenseeName()  
     this.getLottery_Names() 
    },
}
</script>

<!--Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>