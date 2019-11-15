<template>
    <div class="edit">
        <h1>Cập nhật dữ liệu học sinh</h1>
        <div class="component-cotainer">
            <form @submit.prevent="updateStudent">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mã học sinh</label>
                            <input type="text" class="form-control" v-model="student.student_code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên học sinh</label>
                            <input type="text" class="form-control" v-model="student.student_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Giới tính</label>
                            <select id="gender" class="form-control" v-model="student.gender">
                                <option value = "0">Nam</option>
                                <option value = "1">Nữ</option>
                                <option value = "2">Khác</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Lớp</label>
                            <select id="grade" class="form-control" v-model="student.grade">
                                <option value = "0">10</option>
                                <option value = "1">11</option>
                                <option value = "2">12</option>
                            </select>
                        </div>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" v-model="student.address" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" v-model="student.email">
                        </div>
                    </div>
                </div>           
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>GPA</label>
                            <input type="number" class="form-control" v-model="student.GPA">
                        </div>
                    </div>
                </div><br />
                <div class="form-group">
                    <button class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
    .edit {
        background-color: white;
        border-radius: 5px;
        padding: 1px 10px 10px 10px;
    }
    .component-cotainer {
        border: 1px solid black;
        border-radius: 5px;
        padding: 5px 0px 0px 10px;
    }
</style>

<script>
    export default {
        data() {
            return {
                student: {}
            }
        },
        created() {
            let uri = `http://localhost:8000/api/list/edit/${this.$route.params.id}`;
            this.axios.get(uri).then((response) => {
                this.student = response.data;
            });
        },
        methods: {
            updateStudent() {
                let uri = `http://localhost:8000/api/list/update/${this.$route.params.id}`;
                this.axios.post(uri, this.student).then((response) => {
                    this.$router.push({name: 'lists'});
                });
            }
        }
    }
</script>