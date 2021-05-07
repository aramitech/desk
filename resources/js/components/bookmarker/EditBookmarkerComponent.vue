<template>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">View Bookmarkers</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                          <div class="form-group row">
                       <div class="col-md-6">
							<label>Licensee Name</label>
							<input class="form-control" name="licensee_name" v-model="fields.licensee_name" type="text" placeholder="Licensee Name" required>
                            <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
						</div>

 <div class="col-md-6">
            <label for="Bookmarkers_company_id"> Licensee Name</label>        
            <multiselect  name="Bookmarkers_company_id" v-model="fields.Bookmarkers_company_id"  track-by="Bookmarkers_company_id" label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange" >
              
            </multiselect>
            <div v-if="errors && errors.Bookmarkers_company_id" class="text-danger">{{ errors.Bookmarkers_company_id[0] }}</div>
      
        </div>  </div>


  <div class="form-group row">
					<div class="col-md-6">
							<label>Trading Name</label>
							<input class="form-control" name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" >
                            <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
						</div>
                      <div class="col-md-6">
							<label>License No</label>
							<input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" required>
                            <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
						</div></div>
    <div class="form-group row">                      
                        <div class="col-md-6">
							<label>Return For The Period Of</label>
							<input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" value="" type="date" placeholder="Return For The Period Of" >
                            <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
						</div>
                       <div class="col-md-6">
							<label>Return For The Period To</label>
							<input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" value="" type="date" placeholder="Return For The Period To" >
                            <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
						</div></div>
<div class="form-group row">   

                            <div class="col-md-4">
							<label>Branch</label>
							<input class="form-control"  name="branch" v-model="fields.branch" value="" type="text" placeholder="branch" required>
                            <div v-if="errors && errors.branch" class="text-danger">{{ errors.branch[0] }}</div>
						</div>
                          <div class="col-md-4">
							<label>Date</label>
							<input class="form-control"  name="date" v-model="fields.date" value="" type="date" placeholder="Date" required>
                            <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
						</div>
  
                          <div class="col-md-4">
							<label>Bets No</label>
							<input class="form-control"  name="bets_no" v-model="fields.bets_no" value="" type="text" placeholder="bets_no" required>
                            <div v-if="errors && errors.bets_no" class="text-danger">{{ errors.bets_no[0] }}</div>
						</div></div>
<div class="form-group row">  
                           <div class="col-md-4">
							<label>Deposits</label>
							<input class="form-control"  name="deposits" v-model="fields.deposits" value="" type="text" placeholder="Deposits" required>
                            <div v-if="errors && errors.deposits" class="text-danger">{{ errors.deposits[0] }}</div>
						</div>
                     
                            <div class="col-md-4">
							<label>Total Sales</label>
							<input class="form-control"  name="total_sales" v-model="fields.total_sales" value="" type="text" placeholder="total_sales" required>
                            <div v-if="errors && errors.total_sales" class="text-danger">{{ errors.total_sales[0] }}</div>
						</div>
                            <div class="col-md-4">
							<label>Total Payout</label>
							<input class="form-control"  name="total_payout" v-model="fields.total_payout" value="" type="text" placeholder="Total Payout" required>
                            <div v-if="errors && errors.total_payout" class="text-danger">{{ errors.total_payout[0] }}</div>
						</div></div>
  <div class="form-group row">                       
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht" value="" type="text" placeholder="WHT" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>Win Loss</label>
							<input class="form-control"  name="winloss" v-model="fields.winloss" value="" type="text" placeholder="winloss" required>
                            <div v-if="errors && errors.winloss" class="text-danger">{{ errors.winloss[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control"  name="ggr" v-model="fields.ggr" value="" type="text" placeholder="GGR" required>
                            <div v-if="errors && errors.ggr" class="text-danger">{{ errors.ggr[0] }}</div>
						</div>
						</div>
                        
                    </div>
                 <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
  props: [ 'bookmarkerdata' ],
data() {
    return {
        action: '/bookmarkers/update', //edit action
        text: 'Updated Succesfully',
        redirect: '/bookmarkers',

 company_names: [],

        fields: {
            bookmarker_id:this.bookmarkerdata.bookmarker_id,
            license_no:this.bookmarkerdata.license_no,
            return_for_the_period_of:this.bookmarkerdata.return_for_the_period_of,
        licensee_name:this.bookmarkerdata.licensee_name,
         return_for_the_period_to:this.bookmarkerdata.return_for_the_period_to,
          branch:this.bookmarkerdata.branch,
           date:this.bookmarkerdata.date,
            bets_no:this.bookmarkerdata.bets_no,
             deposits:this.bookmarkerdata.deposits,
              total_sales:this.bookmarkerdata.total_sales,
               total_payout:this.bookmarkerdata.total_payout,
                wht:this.bookmarkerdata.wht,
                 winloss:this.bookmarkerdata.winloss,
                  ggr:this.bookmarkerdata.ggr,
       }
        }
    },

methods: {
    getLicenseeName: function(){
        axios.get('/license_name/get')
        .then(function(response){
          this.company_names = response.data;
         
        }.bind(this));
  
      },
    },
        created: function(){  
     this.getLicenseeName()   
    },
    mounted() {
        this.fields.bookmarker_id=this.bookmarkerdata.bookmarker_id;
        this.fields.license_no=this.bookmarkerdata.license_no;
        this.fields.return_for_the_period_of=this.bookmarkerdata.return_for_the_period_of;
        this.fields.licensee_name=this.bookmarkerdata.licensee_name;
         this.fields.return_for_the_period_to=this.bookmarkerdata.return_for_the_period_to;
          this.fields.branch=this.bookmarkerdata.branch;
           this.fields.date=this.bookmarkerdata.date;
            this.fields.bets_no=this.bookmarkerdata.bets_no;
             this.fields.deposits=this.bookmarkerdata.deposits;
              this.fields.total_sales=this.bookmarkerdata.total_sales;
               this.fields.total_payout=this.bookmarkerdata.total_payout;
                this.fields.wht=this.bookmarkerdata.wht;
                 this.fields.winloss=this.bookmarkerdata.winloss;
                 this.fields.ggr=this.bookmarkerdata.ggr;
   }
}
</script>







               
               