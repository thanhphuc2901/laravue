<template>
    <div>
        <h1>Tạo mới dữ liệu học sinh</h1>
        <form @submit.prevent="addStudent">
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
                <div class="col-md-6">
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
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>GPA</label>
                        <input type="number" class="form-control" v-model="student.GPA">
                    </div>
                </div>
            </div><br />
            <div class="form-group">
                <button class="btn btn-primary">Tạo mới</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                student:{}
            }
        },
        methods: {
            addStudent(){
                let uri = 'http://localhost:8000/api/list/create';
                this.axios.post(uri, this.student).then((response) => {
                    this.$router.push({name: 'lists'});
                });
            }
        }
    }
</script>