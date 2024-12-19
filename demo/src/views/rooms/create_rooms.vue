<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import api from "../../api";

const router = useRouter();
const errors = ref({});

const room = ref({
    room_number: "",
    room_type: "",
    price: "",
    status: "available",
    description: ""
});

const createRoom = async () => {
    try {
        const response = await api.post('/api/rooms', room.value);
        
        if (response.data) {
            alert("Room created successfully!");
            router.push({ name: "rooms.index" });
        }
    } catch (error) {
        if (error.response?.data?.errors) {
            errors.value = error.response.data.errors;
        } else {
            console.error("Error creating room:", error);
            alert("Failed to create room!");
        }
    }
};
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4 class="mb-3">Create New Room</h4>
                        <form @submit.prevent="createRoom">

                            <div class="mb-3">
                                <label class="form-label fw-bold">Type</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="room.type"
                                    placeholder="Enter room type"
                                />
                                <div v-if="errors.type" class="alert alert-danger mt-2">
                                    {{ errors.type[0] }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea
                                    class="form-control"
                                    v-model="room.description"
                                    rows="3"
                                    placeholder="Enter room description"
                                ></textarea>
                                <div v-if="errors.description" class="alert alert-danger mt-2">
                                    {{ errors.description[0] }}
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary me-2">Create</button>
                                <button type="button" @click="router.push({name: 'rooms.index'})" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>