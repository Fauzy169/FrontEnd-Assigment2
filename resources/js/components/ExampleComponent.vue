

<template>
  <div class="container">
    <products-section :listdata="list" @emitAddToCart="addToCart" />
    <cart :listdata="listCart" @emitDelete="deleteProduct" />
    <div class="mt-3">
      <strong>Total Belanja: Rp. {{ calculateTotal }}</strong>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      list: [
        {
          name: "Indomie Goreng Rendang",
          description: "Masakan instan terenak di dunia",
          stock: 10,
          price: 3900,
        },
        {
          name: "Mie Gelas Rendang",
          description: "Mie instan khusus anak kosan",
          stock: 4,
          price: 1500,
        },
        {
          name: "Bakmi Mewah",
          description: "Kalau anak kosan jangan macem2 deh",
          stock: 80,
          price: 10000,
        },
      ],
      listCart: [],
    };
  },
  computed: {
    calculateTotal() {
      return this.listCart.reduce((total, item) => {
        return total + item.quantity * item.price;
      }, 0);
    },
  },
  methods: {
    addToCart(index) {
      this.list[index].stock = this.list[index].stock - 1;

      const indexCart = this.listCart.findIndex(
        (item) => item.name === this.list[index].name
      );

      if (indexCart === -1) {
        this.listCart.push({
          name: this.list[index].name,
          quantity: 1,
          price: this.list[index].price,
        });
      } else {
        this.listCart[indexCart].quantity += 1;
      }

      // Emit event untuk memberitahu perubahan pada keranjang belanja
      this.$emit("emitAddToCart", this.listCart);

      // Jangan lupa untuk menjalankan calculateTotal setiap kali ada perubahan pada keranjang belanja
      console.log("Total Belanja sekarang:", this.calculateTotal);
    },
    deleteProduct(index) {
      this.listCart.splice(index, 1);

      const productName = this.listCart[index].name;
      const productIndex = this.list.findIndex(
        (item) => item.name === productName
      );
      this.list[productIndex].stock += 1;

      // Emit event untuk memberitahu perubahan pada keranjang belanja
      this.$emit("emitDelete", this.listCart);

      // Jangan lupa untuk menjalankan calculateTotal setiap kali ada perubahan pada keranjang belanja
      console.log("Total Belanja sekarang:", this.calculateTotal);
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
