 <template>
    <div class="modal fade" id="addshop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Department</h4>
      <!-- <form method="POST" @submit.prevent="submit">
          <button type="submit" class="btn btn-primary">View Bookmarker Shop</button>
       </form> -->
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body"> 
                        
 <div class="trf"> 
<div class="form-group row">   

                            <div class="col-md-12">
							<label>Department</label>
							<input class="form-control"  name="department_name" v-model="fields.department_name" value="" type="text" placeholder="" required>
                            <div v-if="errors && errors.department_name" class="text-danger">{{ errors.class[0] }}</div>
						</div>
                        
  
                      </div>

</div>
                        
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

export default {
  mixins: [ FormMixin ],
data() {
    return {
        action: '/desk/public/departments/add', //save action
        text: 'Added Succesfully',
        redirect: '',
        //redirect: '/desk/public/departments',
        }
    },

methods: {

    }
}
</script>
