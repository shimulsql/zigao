/**
 * 
 * @param {String} str sting with '+' seperator
 * @param {Bool} onlyVal if true, it's only returns only value.
 * @returns array, or select2 formatted array
 */
export const strToSelect = (str, onlyVal = false) => {

  if(!str) return [];

  if(onlyVal) return str.split('+');

  let collection = str.split('+').map(option => ({
    id: option,
    text: option,
    selected: true
  }))

  return collection;
}