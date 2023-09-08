export const load = async ({fetch}) => {
    const fetchProducts = async () => {
        let res = await fetch("https://fakestoreapi.com/products");
        let json = await res.json();
        return json
    };

  return {
    products: fetchProducts()
  }


};
