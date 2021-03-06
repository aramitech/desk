<template>
    <div class="modal fade" id="addcategorytype" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Category Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">
                        <div class="form-group">
							<label>Category Name</label>
							<input class="form-control" name="categorytype" v-model="fields.categorytype" type="text" placeholder="Category Type" required>
                            <div v-if="errors && errors.categorytype" class="text-danger">{{ errors.categorytype[0] }}</div>
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
</template>

<script>
import FormMixin from '../shared/FormMixin';

export default {
  mixins: [ FormMixin ],
data() {
    return {
        action: '/categorytypes/add', //save action
        text: 'Added Succesfully',
        redirect: '/categorytypes',
        }
    },

methods: {

    }
}
</script>
