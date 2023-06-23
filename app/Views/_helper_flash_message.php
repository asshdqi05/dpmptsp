<?php
if ($this->session->flashdata('msg_danger')) {
  echo "<div class='alert alert-danger'>" . $this->session->flashdata('msg_danger') . "</div>";
} else if ($this->session->flashdata('msg_success')) {
  echo "<div class='alert alert-success'>" . $this->session->flashdata('msg_success') . "</div>";
} else if ($this->session->flashdata('msg_info')) {
  echo "<div class='alert alert-info'>" . $this->session->flashdata('msg_info') . "</div>";
}
