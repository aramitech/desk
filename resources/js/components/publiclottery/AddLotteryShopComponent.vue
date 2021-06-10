 <template>
    <div class="modal fade" id="addlotteryshop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Lottery </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body"> <div class="trf"> 
                          <div class="form-group row">
 <div class="col-md-6">
            <label for="company_id"> Operator Name</label>        
            <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
            <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
       
        </div> 
           <div class="col-md-6">
							<!-- <label>Licensee Name</label> -->
           <input class="form-control" name="category_type_id" v-model="fields.category_type_id" type="hidden" placeholder="category_type_id" required>

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

                            <div class="col-md-6">
							<label>Lottery Name</label>
							<input class="form-control"  name="lottery_name" v-model="fields.lottery_name" value="" type="text" placeholder="Lottery Name" required>
                            <div v-if="errors && errors.lottery_name" class="text-danger">{{ errors.lottery_name[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>Lottery Number</label>
							<input class="form-control"  name="lottery_number" v-model="fields.lottery_number" value="" type="text" placeholder="Lottery Number" >
                            <div v-if="errors && errors.lottery_number" class="text-danger">{{ errors.lottery_number[0] }}</div>
						</div></div>

 <div class="form-group row">   

                            <div class="col-md-6">
							<label>Status</label>
					       <multiselect  name="status" v-model="fields.status"  placeholder="Select status" :options="types"  :allow-empty="true" :multiple="false" :hide-selected="false" :max-height="150" @input="onChange2"> 
              
            </multiselect>
    <div v-if="errors && errors.status" class="text-danger">{{ errors.status[0] }}</div>
						</div>
                        
  
              <div class="col-md-3">
							<label>From</label>
							<input class="form-control"  name="periodfrom" v-model="fields.periodfrom" value="" type="date" placeholder="period from" >
                            <div v-if="errors && errors.periodfrom" class="text-danger">{{ errors.periodfrom[0] }}</div>
						</div>
                     <div class="col-md-3">
							<label>To</label>
							<input class="form-control"  name="periodto" v-model="fields.periodto" value="" type="date" placeholder="period to" >
                            <div v-if="errors && errors.periodto" class="text-danger">{{ errors.periodto[0] }}</div>
						</div>
            
            </div></div>
                        
                    </div>
                    <div class="modal-footer"> <div class="trf"> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> </div>
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
        action: '/lotterynumber/add', //save action
        text: 'Added Succesfully',
        redirect: '',
    types: ['Active','Inactive'],
    company_names: [],
      fields: {
        license_no:"",
        trading_name:'',
        licensee_name:'',
        category_type_id:'',

                ggr : '',
                total_payout: '',   

            
      }
        }

    },

methods: {
        getLicenseeName: function(){
        axios.get('/publiclottery_license_name/get')
        .then(function(response){
          this.company_names = response.data;        
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
      this.value = value
    this.fields.license_no=this.value.license_no;
       this.fields.trading_name=this.value.trading_name;
     this.fields.licensee_name=this.value.company_name
     this.fields.category_type_id=this.value.category_type_id
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
     this.getLicenseeName()   
    },
     mounted() {
        //this.ggr = this.total_payout * 0.2;
  }
}
</script>


<!--Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
     