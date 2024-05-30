<template>
        <nav class="navbar navbar-expand-lg custom-bg">
        <div class="container-fluid">
            <router-link class="navbar-brand text-white" to="/home">Home</router-link>
            <router-link class="navbar-brand text-white" to="/marketplace">Market-Place</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="@/assets/profile.png" alt="Profile Icon" class="profile-icon me-2" />
                            {{ userName }} 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <router-link class="dropdown-item">Profile</router-link>
                            </li>
                            <li>
                                <router-link class="dropdown-item">Setting</router-link>
                            </li>
                            <li>
                                <router-link to="/logout" class="dropdown-item">Logout</router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
  name: 'NavBar',
  props: {
    userName: {
      type: String, 
      required: true 
    },
  },
};
</script>