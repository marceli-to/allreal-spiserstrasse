export const tikTok = () => {
  const title = document.querySelector('title'), duration = 2500;
  title.innerHTML = "T I C K";
  setTimeout(() => {
    title.innerHTML = "T O C K";
    setTimeout(tikTok, duration);
  }, duration);
};