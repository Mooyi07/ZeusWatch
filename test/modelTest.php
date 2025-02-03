<?php 
// Check if the HDF5 extension is loaded 
    file_get_contents("df_model_save.h5");   
?> 

<script>
    import * as tf from "@tensorflow/tfjs"
  
  // Defining model 
  const Mod = tf.sequential({ 
     layers: [tf.layers.dense({units: 2, inputShape: [30]})] 
  }); 
    
  // Calling predict() method and 
  // Printing output 
  Mod.predict(tf.randomNormal([6, 30])).print();
</script>