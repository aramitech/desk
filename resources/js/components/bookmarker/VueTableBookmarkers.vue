<template>
  <div>
     
     <vue-good-table
      :columns="columns"
      :rows="rows"
      :search-options="{ enabled: true }"
      :pagination-options="{
    enabled: true,
    mode: 'records',
    perPage: 10,
    position: 'bottom',
    dropdownAllowAll: true,
    setCurrentPage: 1,
    nextLabel: 'next',
    prevLabel: 'prev',
    rowsPerPageLabel: 'Rows per page',
    ofLabel: 'of',
    pageLabel: 'page', // for 'pages' mode
    allLabel: 'All',
  }"
   @on-selected-rows-change="selectionChanged"
    :select-options="{ enabled: true }"    
    >
    <template slot="table-row" slot-scope="props">
    <span v-if="props.column.field == 'action'">      
       <button @click="showModal(props.row.bookmarker_id,props.row.bookmarkerscompany,props.row.licensee_name,props.row.license_no,props.row.trading_name,props.row.return_for_the_period_of,props.row.return_for_the_period_to,props.row.branch,props.row.date,props.row.bets_no,props.row.deposits,props.row.total_sales,props.row.total_payout,props.row.wht,props.row.winloss,props.row.ggr)" data-toggle="modal" data-target="#add" id="show-modal"><i class="fa fa-edit"></i></button>
       <button  @click.prevent="deleteItem('bookmarkerdelete',props.row.bookmarker_id)" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>  </button>
       </span>
    <span v-else>
      {{ props.formattedRow[props.column.field] }}
    </span>
  </template>
    </vue-good-table>   
    
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Bookmarker {{ fields.bookmarker_id }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body panel-default bg-light">
              <form method="POST" @submit.prevent="submit">
                <div class="modal-body">
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="company_id"> Licensee Name</label>        
                         <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
                          
                        </multiselect> 
                        <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
                  
                    </div> 
                    <div class="col-md-6">
                      <label>Licensee Name</label>
                        <input class="form-control" name="licensee_name" v-model="fields.licensee_name" type="text" placeholder="Licensee Name" required>
                            <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <div class="col-md-6">
                          <label>Trading Name</label>   
                          <input class="form-control" name="trading_name" v-model="fields.trading_name" type="text" placeholder="Trading Name" :disabled="this.validated ? false : true" required>
                                        <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
                        </div>
                                  <div class="col-md-6">
                          <label>License No</label>
                          <input class="form-control"  name="license_no" v-model="fields.license_no" type="text" placeholder="License No" :disabled="this.validated ? false : true" required>
                                        <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
                        </div>
                      </div>
                      <div class="form-group row">                      
                          <div class="col-md-6">
                          <label>Return For The Period Of</label>
                          <input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" type="date" placeholder="Return For The Period Of" required>
                                        <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
                        </div>
                                  <div class="col-md-6">
                          <label>Return For The Period To</label>
                          <input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" type="date" placeholder="Return For The Period To" required>
                                        <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
                        </div>
                      </div>
                    <div class="form-group row">   

                            <div class="col-md-4">
                        <label>Branch</label>
                        <input class="form-control"  name="branch" v-model="fields.branch" type="text" placeholder="branch" required>
                                      <div v-if="errors && errors.branch" class="text-danger">{{ errors.branch[0] }}</div>
                      </div>
                                    <div class="col-md-4">
                        <label>Date</label>
                        <input class="form-control"  name="date" v-model="fields.date" type="date" placeholder="Date" required>
                                      <div v-if="errors && errors.date" class="text-danger">{{ errors.date[0] }}</div>
                      </div>
  
                          <div class="col-md-4">
                          <label>Bets No</label>
                          <input class="form-control"  name="bets_no" v-model="fields.bets_no" type="text" placeholder="bets_no" required>
                                        <div v-if="errors && errors.bets_no" class="text-danger">{{ errors.bets_no[0] }}</div>
                        </div></div>
                        <div class="form-group row">  
                                      <div class="col-md-4">
                          <label>Deposits</label>
                          <input class="form-control"  name="deposits" v-model="fields.deposits" type="text" placeholder="Deposits" required>
                                        <div v-if="errors && errors.deposits" class="text-danger">{{ errors.deposits[0] }}</div>
                        </div>
                                
                                        <div class="col-md-4">
                          <label>Total Sales</label>
                          <input class="form-control" @keyup="sum" name="total_sales" v-model="fields.total_sales" type="text" placeholder="total_sales" required>
                            <div v-if="errors && errors.total_sales" class="text-danger">{{ errors.total_sales[0] }}</div>
						</div>
                            <div class="col-md-4">
							<label>Total Payout</label>
							<input class="form-control" @keyup="sum" id="total_payout" name="total_payout" v-model="fields.total_payout" type="text" placeholder="Total Payout" required>
                            <div v-if="errors && errors.total_payout" class="text-danger">{{ errors.total_payout[0] }}</div>
						</div></div>
  <div class="form-group row">                       
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht" type="text" placeholder="WHT" :disabled="this.validated ? false : true" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>GGR TAX</label>
							<input class="form-control"  name="winloss" v-model="fields.winloss" type="hidden" :disabled="this.validated ? false : true" placeholder="winloss" >
                           
                           	<input class="form-control"  name="ggrtax" v-model="fields.ggrtax" type="text" placeholder="ggrtax" :disabled="this.validated ? false : true" required>
                            <div v-if="errors && errors.ggrtax" class="text-danger">{{ errors.ggrtax[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>GGR</label>
							<input class="form-control" @keydown="ggrtax" id="ggr" name="ggr" v-model="fields.ggr" value="ggr" type="text" placeholder="GGR" :disabled="this.validated ? false : true" required>
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
                                            </div>
                                        </div>
                                    </div>
   </div>
</template>
  
<script>
import 'vue-good-table/dist/vue-good-table.css';
import FormMixin from '../shared/FormMixin';
import DeleteMixin from '../shared/DeleteMixin';
import Multiselect from 'vue-multiselect';
import { VueGoodTable } from 'vue-good-table';
import Edit from './EditBookmarkerComponent.vue';

export default {
  props:['usertype'],
    mixins: [ FormMixin,DeleteMixin ],
    components:{
        VueGoodTable,Multiselect, Edit
    },
     //props: [ 'bookmarkerdata' ],
  data(){
    return {
      'text': 'Records Updated succesfully',
      'redirect': '',
      action: '/bookmarkers/update', //edit action
      company_names: [],
      
       validated:false,
      fields:{
        bookmarker_id:'',
        company_id:[],
        licensee_name:'',
        trading_name:'',
        license_no:'',
        date:'',
        deposits:'',
        bets_no:'',
        total_sales:'',
        total_payout:'',
        return_for_the_period_of:'',
        return_for_the_period_to:'',
        wht:'',
        winloss:'',
        ggr:'',
        ggrtax:'',
      },       
      
      columns: [
        {
          label: 'ID',
          field: 'bookmarker_id',
        },
        {
          label: 'Name',
          field: 'company_id',
        },
        {
          label: 'Licensee Name',
          field: 'licensee_name',
        },
         {
          label: 'bets_no',
          field: 'bets_no',
        },
         {
          label: 'deposits',
          field: 'deposits',
        },
         {
          label: 'total_sales',
          field: 'total_sales',
        },
          {
          label: 'total_payout',
          field: 'total_payout',
        },
          {
          label: 'wht',
          field: 'wht',
        },
         {
          label: 'Action',
          field: 'action',
        }
        
      ],
      rows: [],
      rowdata:'',
      selectedItems:[],
    };
  },
    computed: {
    isInvalid () {
      return this.isTouched && this.value.length === 0
    },
  },
  methods: {
          getBookmarkers: function(){
        axios.get('/bookmarkersdata/get')
        .then(function(response){
          this.rows = response.data;
        }.bind(this));
       
      },
       getLicenseeName: function(){
        axios.get('/license_name/get')
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
      if (value.indexOf('Reset me!') !== -1) this.value = []
      this.value = value
      this.fields.license_no=this.value.license_no;
      this.fields.trading_name=this.value.trading_name;
      this.fields.licensee_name=this.value.company_name
    },
    onSelect (option) {
      if (option === 'Disable me!') this.isDisabled = false
    },
    onTouch () {
      this.isTouched = true
    },     
     
      editBtn:function(id){
        alert(id);
      },
  
      showModal(bookmarker_id,company_id,licensee_name,license_no,trading_name,return_for_the_period_of,return_for_the_period_to,branch,date,bets_no,deposits,total_sales,total_payout,wht,winloss,ggr){
              //bind the data to the items
              this.fields.bookmarker_id=bookmarker_id;
              this.fields.licensee_name=licensee_name;
              this.fields.trading_name=company_id ? company_id.trading_name : '';
              this.fields.license_no=license_no;
              this.fields.company_id=company_id;
              this.fields.return_for_the_period_of=return_for_the_period_of.substr(0,10);
              this.fields.return_for_the_period_to=return_for_the_period_to.substr(0,10);
              this.fields.branch=branch;
              this.fields.bets_no=bets_no;
              this.fields.date=date;
              this.fields.deposits=deposits;
              this.fields.total_sales=total_sales;
              this.fields.total_payout=total_payout;
              this.fields.wht=wht;
              this.fields.winloss=winloss;
              this.fields.ggr=ggr;
              this.sum();
              console.log(this.fields)
      },

       
      selectionChanged:function(params){
        let c=[];
        params.selectedRows.forEach(function(value,index,array){
        c.push(value.bookmarker_id);      
           
        });
        this.selectedItems=c;      
       
      },
      clickButton:function(){
        let self=this;
        self.$swal({
            title: 'Do you want to Delete contact(s)?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Delete`,
            denyButtonText: `Cancel`,
          }).then((result) => {           
             
            if (result.isConfirmed) {
              //do an axios for deleting
          axios.get('/delete/contact/'+this.selectedItems).then((response) => {  
                 
                  self.selectedItems.forEach(function(value,index,array){
                  self.rows= self.rows.filter(row=>row.bookmarker_id!=value); 

                   self.$swal('Contacts Deleted!', '', 'success')  
                 });                     
                });      
              
            } else if (result.isDenied) {
              self.$swal('Operation Canceled', '', 'info')
            }
          })
              
                 
      },

      
  },mounted() {
        //       this.fields.bookmarker_id=this.bookmarkerdata.bookmarker_id;
        // this.fields.license_no=this.bookmarkerdata.license_no;
        // this.fields.return_for_the_period_of=this.bookmarkerdata.return_for_the_period_of;
        // this.fields.licensee_name=this.bookmarkerdata.licensee_name;
        //  this.fields.return_for_the_period_to=this.bookmarkerdata.return_for_the_period_to;
        //   this.fields.branch=this.bookmarkerdata.branch;
        //    this.fields.date=this.bookmarkerdata.date;
        //     this.fields.bets_no=this.bookmarkerdata.bets_no;
        //      this.fields.deposits=this.bookmarkerdata.deposits;
        //       this.fields.total_sales=this.bookmarkerdata.total_sales;
        //        this.fields.total_payout=this.bookmarkerdata.total_payout;
        //         this.fields.wht=this.bookmarkerdata.wht;
        //          this.fields.winloss=this.bookmarkerdata.winloss;
        //          this.fields.ggr=this.bookmarkerdata.ggr;
        //          this.fields.trading_name=this.bookmarkerdata.trading_name;
        },
  created() {
       this.getBookmarkers() 
    this.getLicenseeName() 
  },

};
</script> 