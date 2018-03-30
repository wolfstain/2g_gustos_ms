class CreateSubcategories < ActiveRecord::Migration[5.1]
  def change
    create_table :subcategories do |t|
      t.string :name, limit: 50
      t.integer :category_id
      t.string :description, limit: 150

      t.timestamps
    end
  end
end
