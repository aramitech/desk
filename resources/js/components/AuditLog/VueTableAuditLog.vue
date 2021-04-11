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


export default {
    mixins: [ FormMixin,DeleteMixin ],
    components:{
        VueGoodTable,Multiselect, Edit
    },
     //props: [ 'bookmarkerdata' ],
  data(){
    return {
      'text': 'Records Updated succesfully',
      'redirect': '',
      action2: '/contacts/editContacts',
    
      
       validated:false,
      fields:{
        bookmarker_id:'',
        company_id:[],


      },       
      

      columns: [
        {
          label: 'ID',
          field: 'audit_log_id',
        },
        {
          label: 'audit_module',
          field: 'audit_module',
        },
        {
          label: 'audit_activity',
          field: 'audit_activity',
        },
         {
          label: 'user_category',
          field: 'user_category',
        },
         {
          label: 'id',
          field: 'id',
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
          getAuditLogs: function(){
        axios.get('/AuditLogsdata/get')
        .then(function(response){
          this.rows = response.data;
           console.log(response)
        }.bind(this));
       
      },
       getLicenseeName: function(){
        axios.get('/license_name/get')
        .then(function(response){
          this.company_names = response.data;
           console.log(this.company_names)
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
    console.log(value)
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
              this.fields.bookmarker_id=bookmarker_id
              this.fields.licensee_name=licensee_name
              this.fields.trading_name=trading_name
              this.fields.licensee_no=license_no
              this.fields.company_id=company_id
              this.fields.return_for_the_period_of=return_for_the_period_of
              this.fields.return_for_the_period_to=return_for_the_period_to
              this.fields.branch=branch
              this.fieilds.bets_no=bets_no
              this.fields.date=date
              this.fields.deposits=deposits
              this.fieldds.total_sales=total_sales
              this.fields.total_payout=total_payout
              this.fields.wht=wht
              this.fields.winloss=winloss
              this.fields.ggr=ggr
              console.log(ggr,'fffffffffffffffdddd')
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
                 this.fields.trading_name=this.bookmarkerdata.trading_name;
        },
  created() {
       this.getAuditLogs() 
    this.getLicenseeName() 
  },

};
</script> 