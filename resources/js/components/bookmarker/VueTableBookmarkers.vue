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
    dropdownAllowAll: false,
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
       <button @click="showModal(props.row.bookmarker_id,props.row.company_id,props.row.licensee_name,props.row.license_no)" data-toggle="modal" data-target="#add" id="show-modal"><i class="fa fa-edit"></i></button>
       <button  @click.prevent="deleteItem('fccontactdelete',props.row.bookmarker_id)" class="btn btn-danger btn-sm"> <i class="fa fa-trash-alt"></i> </button>
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
                        <!-- <multiselect  name="company_id" v-model="fields.company_id"   label="company_name" placeholder="Select License name" :options="company_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
                          
                        </multiselect> -->
                        <div v-if="errors && errors.company_id" class="text-danger">{{ errors.company_id[0] }}</div>
                  
                    </div> 
                    <div class="col-md-6">
                        <!-- <label>Licensee Name</label> -->
                        <input class="form-control" name="licensee_name" v-model="fields.licensee_name" type="text" placeholder="Licensee Name" required>
                            <div v-if="errors && errors.licensee_name" class="text-danger">{{ errors.licensee_name[0] }}</div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <div class="col-md-6">
                          <label>Trading Name</label>   
                          <input class="form-control" name="trading_name" v-model="fields.trading_name" value="" type="text" placeholder="Trading Name" :disabled="this.validated ? false : true" required>
                                        <div v-if="errors && errors.trading_name" class="text-danger">{{ errors.trading_name[0] }}</div>
                        </div>
                                  <div class="col-md-6">
                          <label>License No</label>
                          <input class="form-control"  name="license_no" v-model="fields.license_no" value="" type="text" placeholder="License No" :disabled="this.validated ? false : true" required>
                                        <div v-if="errors && errors.license_no" class="text-danger">{{ errors.license_no[0] }}</div>
                        </div>
                      </div>
                      <div class="form-group row">                      
                          <div class="col-md-6">
                          <label>Return For The Period Of</label>
                          <input class="form-control"  name="return_for_the_period_of" v-model="fields.return_for_the_period_of" value="" type="date" placeholder="Return For The Period Of" required>
                                        <div v-if="errors && errors.return_for_the_period_of" class="text-danger">{{ errors.return_for_the_period_of[0] }}</div>
                        </div>
                                  <div class="col-md-6">
                          <label>Return For The Period To</label>
                          <input class="form-control"  name="return_for_the_period_to" v-model="fields.return_for_the_period_to" value="" type="date" placeholder="Return For The Period To" required>
                                        <div v-if="errors && errors.return_for_the_period_to" class="text-danger">{{ errors.return_for_the_period_to[0] }}</div>
                        </div>
                      </div>
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
                          <input class="form-control" @keyup="sum" name="total_sales" v-model="fields.total_sales" value="" type="text" placeholder="total_sales" required>
                            <div v-if="errors && errors.total_sales" class="text-danger">{{ errors.total_sales[0] }}</div>
						</div>
                            <div class="col-md-4">
							<label>Total Payout</label>
							<input class="form-control" @keyup="sum" id="total_payout" name="total_payout" v-model="fields.total_payout" value="" type="text" placeholder="Total Payout" required>
                            <div v-if="errors && errors.total_payout" class="text-danger">{{ errors.total_payout[0] }}</div>
						</div></div>
  <div class="form-group row">                       
                           <div class="col-md-4">
							<label>WHT</label>
							<input class="form-control"  name="wht" v-model="fields.wht" value="" type="text" placeholder="WHT" :disabled="this.validated ? false : true" required>
                            <div v-if="errors && errors.wht" class="text-danger">{{ errors.wht[0] }}</div>
						</div>
                           <div class="col-md-4">
							<label>GGR TAX</label>
							<input class="form-control"  name="winloss" v-model="fields.winloss" value="" type="hidden" :disabled="this.validated ? false : true" placeholder="winloss" >
                           
                           	<input class="form-control"  name="ggrtax" v-model="fields.ggrtax" value="" type="text" placeholder="ggrtax" :disabled="this.validated ? false : true" required>
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
    mixins: [ FormMixin,DeleteMixin ],
    components:{
        VueGoodTable,Multiselect, Edit
    },
    
  data(){
    return {
      'text': 'Contacts Updated succesfully',
      'redirect': '',
      action2: '/fc/contacts/editContacts',
      group_names: [],
       allgroup_names:[],
       validated:false,
      fields:{
        bookmarker_id:'',
        company_id:'',
        licensee_name:'',
        license_no:'',
     
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
           console.log(response)
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
      showModal(bookmarker_id,company_id,licensee_name,license_no){
              //bind the data to the items
              this.fields.bookmarker_id=bookmarker_id
              this.fields.licensee_name=licensee_name
              this.fields.licensee_no=license_no
              this.fields.company_id=company_id
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
      
        },
  created() {
       this.getBookmarkers() 

  },

};
</script> 